import store from '../../store';

export default function auth(to, from, next) {
  console.log('ahmnad from middleware')
  console.log('ahmnad from middleware')
  console.log('ahmnad from middleware')
  console.log('ahmnad from middleware')
  let loggedIn = store.state.auth.user != null;
  if (localStorage.user_data) {
    loggedIn = true;
    store.dispatch('auth/load', JSON.parse(localStorage.user_data).user);
  }
  let un_guarded_routes = ['login', 'register', 'reset_password', 'code_check', 'new_password', 'admin',];
  let un_guarded = un_guarded_routes.find(route => route == to.name) != undefined;
  let guarded_routes = ['my-account', 'cart' , 'favorite'];
  let guarded = guarded_routes.find(route => route == to.name) != undefined;
  if (loggedIn && !un_guarded)
    return next();
  if (loggedIn && un_guarded)
    return next('/')
  if (!loggedIn && guarded) {
    return next('/login')
  }
  if (un_guarded_routes.find(route => route == to.name) != undefined || to.name == '403')
    return next();
  return next();
}