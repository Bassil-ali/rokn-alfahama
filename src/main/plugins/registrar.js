import { kebabCase } from 'lodash';
import Vue from 'vue';
const context = require.context('../components', true, /\.(vue)$/i);
context.keys().map(i=>{
    if(i!='./index.js')
    Vue.component(kebabCase(i.split("/").reverse()[0].split(".")[0]),context(i).default);
});
export default Vue;