import './bootstrap';

import {Html5QrcodeScanner} from "html5-qrcode"

var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        console.log(`Scan result ${decodedText}`, decodedResult);
        Livewire.dispatch('qr-scanned', {
            'qr': decodedText,
        });
    }
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
        fps: 10,
        qrbox: {
            width: 300,
            height: 300
        }
    },
    /* verbose= */
    false);

html5QrcodeScanner.render(onScanSuccess);