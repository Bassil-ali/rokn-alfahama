import {
    kebabCase
} from 'lodash';
const context = require.context('../views', true, /\.(vue)$/i);
const routes = [

];
context.keys().map(i => {
    if (i != './index.js')
        routes.push({
            path: '/' + kebabCase(i.split(".")[1]),
            component: context(i).default,
            name: i.split(".")[1].split("/").map(r => kebabCase(r)).join(".")
        });
});
export default routes;