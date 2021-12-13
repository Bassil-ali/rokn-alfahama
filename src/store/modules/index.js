//auto require modules
import { snakeCase } from 'lodash';
const context = require.context('.', true, /\.(js)$/i);
let modules = {};
context.keys().map(i=>{
    if(i!='./index.js')
    modules[snakeCase(i.split(".")[1])] = context(i).default;
});
// console.log(modules);
export default modules;
