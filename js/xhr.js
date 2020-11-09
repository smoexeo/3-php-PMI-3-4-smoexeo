const requestURL = 'https://jsonplaceholder.typicode.com/comments'
const xhr = new XMLHttpRequest()
xhr.open('GET', requestURL)
xhr.responseType = 'json'
xhr.onload = () => {
    console.log(xhr.response)
}
xhr.onerror = () => {
    console.log(xhr.response)
}
xhr.send()