document.addEventListener("DOMContentLoaded", () => {
    let search = document.querySelector("[name='discordo']")
    let div = document.getElementById('discord')
    let data = new FormData();
    tab=[]
console.log(search.value)
    data.append('chan', encodeURIComponent(search.value))
fetch( './class/Chat.php?test=1', 
    { 
        method: 'POST', 
        body:data,  
    }).then(response => console.log(response.json()))
    .then((results) => console.log(results))

                // .then(function () { tab[0].value.forEach((element) =>
                //     );
                //     div[0].innerHTML += '<hr>'
                // })
                // setTimeout(discord(), 1000);

    }
    )
