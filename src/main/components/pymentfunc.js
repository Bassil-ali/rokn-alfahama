

export function responseHandler() {
    console.log("AAAAA77AAAAAAA");

    if (response.messages.resultCode === "Error") {
        var i = 0;
        while (i < response.messages.message.length) {
            console.log(
                response.messages.message[i].code +
                ": " +
                response.messages.message[i].text
            );
            i = i + 1;
        }
    } else {
        paymentFormUpdate(response.opaqueData);
    }
}
export function paymentFormUpdate() {

    document.getElementById("dataDescriptor").value =
        opaqueData.dataDescriptor;
    document.getElementById("dataValue").value = opaqueData.dataValue;
    document.getElementById("paymentForm").submit();

}

