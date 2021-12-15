// import {
//     snakeCase
// } from 'lodash';
const context = require.context('./views/dashboard', true, /\.(vue)$/i);
let routes = [];
context.keys().map((i) => {
    let path = i.split(".vue")[0].split(".")[1].toLowerCase();
    if (path.includes('index')) {
        path = path.split("/");
        path.splice(-1, 1);
        path = path.join("/");
        if (path.length == 0)
            path = "/"
    }
    let name = path.split("/").join('.').slice(1);//.splice(0,1);
    routes.push({
        path: path + '/:id?',
        component: context(i).default,
        name,
        // props:true
    });
});

// console.log(routes);
export default routes;