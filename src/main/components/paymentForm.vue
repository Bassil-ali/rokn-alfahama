<template>
  <div>
    <script
      type="application/javascript"
      src="https://jstest.authorize.net/v3/AcceptUI.js"
    ></script>
    <form id="paymentForm" method="POST" action="#">
      <input type="hidden" name="dataValue" id="dataValue" />
      <input type="hidden" name="dataDescriptor" id="dataDescriptor" />
      <button
        type="button"
        class="AcceptUI button"
        data-billingAddressOptions='{"show":true, "required":false}'
        data-apiLoginID="6gRn57Qhb6Ts"
        data-clientKey="4RP8BUF6nhjXaVY825qVy8rJh3p3SFNgwap5J2V746V9Tr4xmbWvtdRy7PhaMh2L"
        data-acceptUIFormBtnTxt="Submit"
        data-acceptUIFormHeaderTxt="Card Information"
        :data-responseHandler="responseHandler"
      >
        Pay
      </button>
    </form>
  </div>
  
</template>

<script>
// import { responseHandler } from "./course.js";
// import { paymentFormUpdate } from "./course.js";
import "./pymentfunc.js";
export default {};
</script>
 

<style>
</style>