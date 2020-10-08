if ('serviceworker' in navigator) {
    navigator.serviceWorker.register('./serviceWorker.js')
        .then(reg => console.log('Register Done', reg))
        .catch(err => console.log('Error in Register', err))
}