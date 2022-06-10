document.addEventListener("DOMContentLoaded", () => {
    let search = document.querySelector("[name='discordo']")
    let discord = document.getElementById('discord')
  
//-----------------user friendly password--------
let password = document.querySelector("[name='password']")
let p = document.querySelectorAll("p")


let regexLowerCase = /[a-z]{1,}/
let regexUpperCase = /[A-Z]{1,}/
let regexNumber = /[0-9]{1,}/
//let regexSpeCharac = /^[^@&".()!_$*€£`+=\/;?#]+$/
let passwordMinLength = /^[A-Za-z0-9\d@$!%*?&].{6,}$/

password.addEventListener("keyup", () => {

console.log(password.value)

    if (regexLowerCase.test(password.value) == true) {
        // on mondifie le style avec la commande style.color
        p[0].style.color = 'aqua'

    } else {

        p[0].style.color = 'grey'
    }


    if (regexUpperCase.test(password.value) == true) {

        // on mondifie le style avec la commande style.color
        p[1].style.color = 'aqua'

    } else {

        p[1].style.color = 'grey'
    }


    if (passwordMinLength.test(password.value) == true) {
        console.log(passwordMinLength.test(password.value))
        // on mondifie le style avec la commande style.color
        p[2].style.color = 'aqua'

    } else {
        p[2].style.color = 'grey'
    }

    if (regexNumber.test(password.value) == true) {

        p[3].style.color = 'aqua'

    } else {

        p[3].style.color = 'grey'
    }
}
)
//---------variable pour chat--------------------------
    let discord2 = document.querySelector("[name='chan']")
    let content  = document.querySelector("[name='content']")
    let pseudo  = document.querySelector("[name='pseudo']")
    let data = new FormData();
    let tab = []
    let tab2 = []
    let send = document.getElementById('send')
//---------recuperation de données du select--------------------------
    search.addEventListener("click", () => {
discord2.value = search.value
    })
//---------envoie du message en bdd--------------------------
    send.addEventListener("click", () => {
data.append('pseudo', encodeURIComponent(pseudo.value))
data.append('chan', encodeURIComponent(discord2.value))
data.append('content', unescape(encodeURI(content.value)))

fetch('./class/Chat.php?test=3',
{
    method: 'POST',
    body:data,
});
console.log(content.value)
content.value=''


})
    
 //---------recup des message en bdd--------------------------   
    function discordo() {
        discord.innerHTML = ''
        data.append('chan', encodeURIComponent(search.value))
        fetch('./class/Chat.php?test=1',
            {
                method: 'POST',
                body: data,
            })
            .then(response => response.json(), { cache: "reload" })
            .then((results) => results.forEach((element) => tab.push(element)))
            .then(function () {
                tab.forEach((element) =>
                    discord.innerHTML += `     
                    ${element.login}
                                        ${element.content}
                                            ${element.date}`

                );

            })
    }
    discordo()

    function check() {

        data.append('chan', encodeURIComponent(search.value))
        fetch('./class/Chat.php?test=2',
            {
                method: 'POST',
                body: data,
            })
            .then(response => response.json(), { cache: "reload" })
            .then((results) => results.forEach((element) => tab2.push(element)))
            .then(function () {
                if (tab === tab2) {
                    return
                } else {
                    discord.innerHTML = ''
                    tab = tab2
                    tab2 = []
                    tab.forEach((element) =>
                        discord.innerHTML += `
                ${element.login}
                ${element.content}
                ${element.date}
                `);
                }
                setTimeout(check, 1);
            })
    }
    check()

  


 



  



})








