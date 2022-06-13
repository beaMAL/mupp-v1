
import store from '../store/index';

export default function auth({ to, next, store }) {


    const loginQuery = { path: "/login", query: { redirect: to.fullPath } };

    if (!store.getters["auth/authUser"]) {
        store.dispatch("auth/getAuthUser").then(() => {
          if (!store.getters["auth/authUser"]) next(loginQuery);
          else next();
        });
      } else {
        next();
      }

 /**  if (!store.getters['auth/check']) {
    Cookies.set('intended_url', to.path)

    return router.push({name : 'login'})
  } else {
    return next();
  }
  */
}
