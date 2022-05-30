document.addEventListener("DOMContentLoaded", async() => {
    // let search = document.querySelector("[name='chan']")
    let div = document.getElementById('discord')
    let data = new FormData();
    // tab=[]
// console.log(search.value)
    // data.append('chan', encodeURIComponent(search.value))
        // console.log(data)
 await fetch( url='http://localhost/project/chat/libraries/model/chat.php', 
    { 
        method: 'GET', 
        body:undefined,  
    }).then(response => console.log(response.json()))
    .then((results) => console.log(results))

                // .then(function () { tab[0].value.forEach((element) =>
                //     );
                //     div[0].innerHTML += '<hr>'
                // })
                // setTimeout(discord(), 1000);

    }
    )

