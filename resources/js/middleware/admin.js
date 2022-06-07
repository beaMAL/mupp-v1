import store from '~/store'

export default function admin({ next, store }) {

    if (store.getters["auth/isAdmin"])next({ name: 'home' })
    else next({ name: "404" });
  }

//   if (!store.getters['auth/check']) {
//     next({ name: 'home' })
//     return false
//   }

//   if (store.getters['auth/user'].role !== 1) {
//     next({ name: 'admin' })
//   } else {
//     next()
//   }


