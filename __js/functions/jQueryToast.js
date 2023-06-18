function toastMessageSuccess(heading, text) {
    $.toast({
        heading: heading,
        text: text,
        position: 'top-center',
        stack: false,
        bgColor: '#2ecc71',
        textColor: '#fff',
        hideAfter: 3500
    })
}

function toastMessageError(heading, text) {
    $.toast({
        heading: heading,
        text: text,
        position: 'top-center',
        stack: false,
        bgColor: '#c0392b',
        textColor: '#fff',
        hideAfter: 3500
    })
}