import {
    kebabCase
} from 'lodash';
const context = require.context('../views', true, /\.(vue)$/i);
const routes = [

];
context.keys().map(i => {
    // console.log(i.split(".")[1].split("/").map(r => kebabCase(r)).join("."));
    if (i != './index.js')
        routes.push({
            path: '/' + kebabCase(i.split(".")[1]) + '/:id?' + '/:eid?',
            component: context(i).default,
            name: i.split(".")[1].split("/").map(r => kebabCase(r)).join(".").slice(1),
            props: true

        });
});
export default routes;