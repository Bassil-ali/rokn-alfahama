import store from '../../store';

export default (to, from, next) => {

  if (store.state.auth.user == null) {
    store.dispatch('auth/unload');
  }
  let loggedIn = store.state.auth.user != null;
  if (localStorage.user_data) {
    loggedIn = true;
    store.dispatch('auth/load', JSON.parse(localStorage.user_data).user);
  }
  // state.auth.user.user.role_id
  let un_guarded_routes = ['login', 'register', 'reset_password', 'code_check', 'new_password'];
  let un_guarded = un_guarded_routes.find(route => route == to.name) != undefined;
  if (loggedIn && !un_guarded && JSON.parse(localStorage.user_data).user.user.role_id == 1)
    return next()
  if (loggedIn && un_guarded)
    return next('/main/login')
  if (un_guarded_routes.find(route => route == to.name) != undefined || to.name == '403')
    return next();
  document.location = "/main/login";
}