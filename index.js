
let object = [
    {id: 'l0', value: 'Построить дом'},
    { id: 'l1', value: 'Посадить дерево'},
    { id: 'l2', value: 'Вырастить сына'}
]

$(window).ready(createLi(object))

let count = 0

if (object == '') {
    count = 0
}
else{
    count = parseInt(object[object.length - 1].id.slice(1)) + 1
}

$('.btn').bind('click', function () {
    if (inputValue() !== '') {
        object.push({ id:'l' + count, value:inputValue() })
        console.log(object);
        $('.input').val('')
        $('*li').remove()
        createLi(object)
        count++
        // let data = String(new Date().toLocaleString().slice(0,-3).split(','))
        // console.log(data.split(','));

    }
});


function createLi(object) {
    for (data of object) {
        let elem = $('<li id='+data.id+'><span>' + data.value +'</span><button></button></li>')
        $('.list').append(elem)
    }

}

$('ul').bind('click', function (e) {
    let elem = e.originalEvent.path[1]
    del(elem.id)

});

function del(num) {
    for (let i = 0; i < object.length; i++) {
        if (object[i].id === num) {
            object.splice(i, 1)
            $('*li').remove()
            createLi(object)
        }
    }
}


function inputValue() {
    return ($('.input').val());
}



