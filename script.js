document.addEventListener("DOMContentLoaded", () => {
    let search = document.querySelector("[name='discordo']")
    let discord = document.getElementById('discord')
  

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








