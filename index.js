
let object = [
    { id: 0, value: 'Построить дом' },
    { id: 1, value: 'Посадить дерево' },
    { id: 2, value: 'Вырастьть сына' }
]
$(window).ready(createLi(object))
let count = 3
$('.btn').bind('click', function () {
    if (inputValue() !== '') {
        object.push({ id: count, value: '' + inputValue() })
        console.log(object);
        $('.input').val('')
        count++
        $('*li').remove()
        createLi(object)

    }
});

function createLi(object) {
    for (data of object) {
        $('.list').append('<li id:' + data.id + '> ' + data.value + '<button>Удалить</button></li>')
    }

}

function del(object, id) {
    for (let i = 0; i < object.lenght; i++) {
        console.log(object[i]);
        if (object[i].id == id) {
            delete object[i]
            console.log('work');
            break

        }
    }
}

function Car(make, model, year) {
    this.make = make;
    this.model = model;
    this.year = year;
}



function inputValue() {
    return ($('.input').val());
}




