import store from '../store/index';

 const admin =function({ next, store }) {

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

export default admin;


