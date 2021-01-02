const remove = document.querySelectorAll('.remove-to-do');
const checkBox = document.querySelectorAll('.check-box');
console.log(remove);

remove.forEach(cross=>{
    cross.addEventListener('click', ()=>{
        const id = cross.getAttribute('id');
        console.log(id);
        document.location="app/remove.php?id="+id;       
    })
})


checkBox.forEach(checkEl=>{
    checkEl.addEventListener('click', ()=>{
        const id = checkEl.getAttribute('id');
        console.log(id);
        document.location="app/check.php?id="+id;
    })
})

