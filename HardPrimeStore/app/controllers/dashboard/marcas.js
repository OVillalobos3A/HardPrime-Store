///Método para ocultar y mostrar secciones en cada una de la páginas Scrud.
element = document.getElementById('ocultable');
element.style.display = 'none';  
function mostrarOcultar(){
  element = document.getElementById('ocultable');
  estado = element.style.display;
  if(estado == 'none'){
  element.style.display='block'
  }else{
  element.style.display = 'none'; 
  }
  element = document.getElementById('ocultable1');
  estado = element.style.display;
  if(estado == 'none'){
  element.style.display='block'
  }else{
  element.style.display = 'none'; 
  }
}