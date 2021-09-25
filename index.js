$('.btn').bind('click', function () {
    var jsItem = $('<div>'+ inputValue() +'<button>удалить</button></div>');  
    console.log(jsItem);
    $('.list').append(jsItem);
    $('.input').val('') 
});


function inputValue() {
    var newList = $('<ul><li>Item1</li><li>Item2</li></ul>');
    console.log(newList.html());
    return ($('.input').val());
}




