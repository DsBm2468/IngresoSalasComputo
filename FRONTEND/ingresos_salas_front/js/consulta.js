// const urlIngresos = "http://127.0.0.1:8000/api/ingresos";
// let ingresos = [];

// function consultarIngresos() {
//   fetch(urlIngresos)
//     .then((res) => res.json())
//     .then((body) => {
//       ingresos = body.data;
//       console.log(ingresos);
//       cargarTablaIngresos();
//     });
// } 

// function cargarTablaIngresos() {
//   // en esta funcion tengo q llamar a la URL
//   // tambien de una vez hacer la condicion de fechas
//   const tbody = document 
//     .getElementById("ingresosTabla") // tabla en el index
//     .getElementsByTagName("tbody")[0];
//   tbody.innerHTML = ingresos
//     .map((item) => {
//       let html = "<tr>";
//       html += "   <td>" + item.codigoEstudiante + "</td>";
//       html += "   <td>" + item.nombreEstudiante + "</td>";
//       html += "   <td>" + item.idPrograma + "</td>";
//       html += "   <td>" + item.fechaIngreso + "</td>";
//       html += "   <td>" + item.horaIngreso + "</td>";
//       html += "   <td>" + item.horaSalida + "</td>";
//       html += "   <td>" + item.idResponsable + "</td>";
//       html += "   <td>" + item.idSala + "</td>";
//       html += "   <td>";
//       html += "       <button>Modificar</button>";
//       html +=
//         '       <button onClick="eliminarContacto(' +
//         item.id +
//         ')">Eliminar</button>';
//       html += "   </td>";
//       html += "</tr>";
//       return html;
//     })
//     .join(" | "); // hace uniones entre arrays y los separa por comillas
// }

// consultarIngresos();

document.addEventListener('DOMContentLoaded', function() {
  fetchIngresos();
});

/*Se corrigio el vendor, se agregaron unos permisos */ 

async function fetchIngresos() { 
const response=   await fetch('http://127.0.0.1:8000/api/ingresos')
//      .then(response => response.json())
//      .then(data => {
//          const ingresos = data.data;
//          const todayIngresos = ingresos.filter(ingreso => ingreso.fechaIngreso === today);
//      }    )
     .catch(error => console.error('\n\n Error en el microservicio de ingresos:', error));
     if (response.body==null){
        const tabla= document.getElementById('ingresosTabla');
        const fila=tabla.insertRow(1);
        const columna=fila.insertCell(0);
        columna.innerHTML="No hay datos para mostrar";
      }
      else
      {
        const res= await response.json();
  //      console.log(res);
        const ingresos=res.data;
    //  console.log(ingresos);
        const today = new Date().toISOString().slice(0,10);
  //      console.log(today);
  const todayIngresos = ingresos.filter(ingreso => ingreso.fechaIngreso === today);
        displayIngresos(todayIngresos);
      }
}


function displayIngresos(ingresosT) {
 if (ingresosT.length === 0) {
    const tabla= document.getElementById('ingresosTabla');
    const fila=tabla.insertRow(1);
    const columna=fila.insertCell(0);
    columna.innerHTML="No hay inscritos";
} else {
        var i=0;
        var fila=null;
        var columna=null;
        const tabla= document.getElementById('ingresosTabla');
        ingresosT.forEach(ingFila => {
            i+=1;
            fila=tabla.insertRow(i);
            columna = fila.insertCell(0);
            columna.innerHTML = ingFila.codigoEstudiante;
            columna = fila.insertCell(1);
            columna.innerHTML  =ingFila.nombreEstudiante;
            columna = fila.insertCell(2);
            columna.innerHTML  =ingFila.idPrograma;
            columna = fila.insertCell(3);
            columna.innerHTML  =ingFila.fechaIngreso;
            columna = fila.insertCell(4);
            columna.innerHTML  =ingFila.horaIngreso;
            columna = fila.insertCell(5);
            columna.innerHTML  =ingFila.horaSalida;
            columna = fila.insertCell(6);
            columna.innerHTML  =ingFila.idResponsable;
            columna = fila.insertCell(7);
            columna.innerHTML  =ingFila.idSala;
      });
  }
}

function filtrarCodigo() {
   const form = document.forms["formCod"];
   const codigo = {
    codigoEstudiante: form["codEst"].value,
   };
   
   if(codigo){
    const tabla= document.getElementById('ingresosTabla');
    ingresosT.forEach(ingFila => {
        i+=1;
        fila=tabla.insertRow(i);
        columna = fila.insertCell(0);
        columna.innerHTML = ingFila.codigoEstudiante;
        columna = fila.insertCell(1);
        columna.innerHTML  =ingFila.nombreEstudiante;
        columna = fila.insertCell(2);
        columna.innerHTML  =ingFila.idPrograma;
        columna = fila.insertCell(3);
        columna.innerHTML  =ingFila.fechaIngreso;
        columna = fila.insertCell(4);
        columna.innerHTML  =ingFila.horaIngreso;
        columna = fila.insertCell(5);
        columna.innerHTML  =ingFila.horaSalida;
        columna = fila.insertCell(6);
        columna.innerHTML  =ingFila.idResponsable;
        columna = fila.insertCell(7);
        columna.innerHTML  =ingFila.idSala;
    });
   }
   
 

 }

// function eliminarContacto(id) {
//   fetch(urlIngresos + "/" + id, { method: "delete" })
//   .then(resp=>resp.json())
//   .then(body=>{
//     const msg = body.data;
//     alert(msg);
//     consultarContactos();
//   });
// }

// document.getElementById("contactoForm").addEventListener("submit", (e) => {
//   e.preventDefault();
//   registrarContacto();
// });