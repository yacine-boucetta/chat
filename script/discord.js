document.addEventListener("DOMContentLoaded", async() => {
    let search = document.querySelector("[name='chan']")
    let div = document.getElementById('discord')
    let data = new FormData();
    // tab=[]
console.log(search.value)
    data.append('chan', encodeURIComponent(search.value))
        // console.log(data)
    fetch('index', 
    { 
        method: 'POST', 
        body: data 
    }).then((response) => console.log(response.json()))
    .then((results) => console.log(results))

                // .then(function () { tab[0].value.forEach((element) =>
                //     div[0].innerHTML += `<a href=element.php?id=${element.id}>${element.name_french}</a>`+'<br>'
                //     );
                //     div[0].innerHTML += '<hr>'
                // })
                // setTimeout(discord(), 1000);

    }
    )

