if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('./serviceworker.js')
        .then(reg => console.log('Register Done', reg))
        .catch(err => console.log('Error in Register', err))
}