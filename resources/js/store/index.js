import Vue from'vue'
import Vuex from'vuex'
import currentUser from './modules/currenUser'

Vue.use(Vuex)

// export default new Vuex.Store({
//     modules: {
//         currentUser
//     },

// })


// Load store modules dynamically.
const requireContext = require.context('./modules', true, /.*\.js$/)

const modules = requireContext.keys()
  .map(file =>
    [file.replace(/(^.\/)|(\.js$)/g, ''), requireContext(file)]
  )
  .reduce((modules, [name, module]) => {
    if (module.namespaced === undefined) {
      module.namespaced = true
    }

    return { ...modules, [name]: module }
  }, {})

export default new Vuex.Store({
  modules
})
