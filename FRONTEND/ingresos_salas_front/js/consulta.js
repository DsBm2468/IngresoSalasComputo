const urlIngresos = "http://127.0.0.1:8000/api/ingresos";
let ingresos = [];


function consultarIngresos() {
  fetch(urlIngresos)
    .then((res) => res.json())
    .then((body) => {
      ingresos = body.data;
       console.log(ingresos);
       cargarTablaIngresos();
     });
 } 
 function cargarTablaIngresos() {
   // en esta funcion tengo q llamar a la URL
   // tambien de una vez hacer la condicion de fechas
   const tbody = document 
     .getElementById("ingresosTabla") // tabla en el index
     .getElementsByTagName("tbody")[0];
   tbody.innerHTML = ingresos
     .map((item) => {
       let html = "<tr>";
       html += "   <td>" + item.codigoEstudiante + "</td>";
       html += "   <td>" + item.nombreEstudiante + "</td>";
       html += "   <td>" + item.idPrograma + "</td>";
       html += "   <td>" + item.fechaIngreso + "</td>";
       html += "   <td>" + item.horaIngreso + "</td>";
       html += "   <td>" + item.horaSalida + "</td>";
       html += "   <td>" + item.idResponsable + "</td>";
       html += "   <td>" + item.idSala + "</td>";
       html += "   <td>";
       html += "       <button>Modificar</button>";
       html +=
         '       <button onClick="eliminarContacto(' +
         item.id +
         ')">Eliminar</button>';
       html += "   </td>";
       html += "</tr>";
       return html;
     })
     .join(" | "); // hace uniones entre arrays y los separa por comillas
 }
 consultarIngresos();

// document.addEventListener('DOMContentLoaded', function() {
//   fetchIngresos();
// });

// function fetchIngresos() {
//   fetch('http://localhost:8000/api/ingresos')
//       .then(response => response.json())
//       .then(data => {
//           const ingresos = data.data;
//           const today = new Date().toISOString().slice(0, 10);
//           const todayIngresos = ingresos.filter(ingreso => ingreso.fechaIngreso === today);
//           displayIngresos(todayIngresos);
//       })
//       .catch(error => console.error('Error fetching ingresos:', error));
// }

// function displayIngresos(ingresos) {
//   const ingresosList = document.getElementsByTagName('ingresosTabla');
//   ingresosList.innerHTML = '';

//   if (ingresos.length === 0) {
//       const listItem = document.createElement('li');
//       listItem.textContent = 'No hay ingresos para hoy.';
//       ingresosList.appendChild(listItem);
//   } else {
//       ingresos.forEach(ingreso => {
//           const listItem = document.createElement('li');
//           listItem.textContent = `${ingreso.nombreEstudiante} - ${ingreso.horaIngreso} a ${ingreso.horaSalida}`;
//           ingresosList.appendChild(listItem);
//       });
//   }
// }





// // function registrarContacto() {
// //   const form = document.forms["contactoForm"];
// //   const contacto = {
// //     nombre: form["nombre"].value,
// //     email: form["email"].value,
// //     telefono: form["telefono"].value,
// //   };
// //   fetch(urlIngresos, {
// //     method: "post",
// //     headers: {
// //       "Content-Type": "application/json",
// //     },
// //     body: JSON.stringify(contacto),
// //   })
// //     .then((resp) => resp.json())
// //     .then((body) => {
// //       const newContacto = body.data;
// //       contactos.push(newContacto);
// //       cargarTablaContactos();
// //       //consultarContactos();
// //     });
// // }

// // function eliminarContacto(id) {
// //   fetch(urlIngresos + "/" + id, { method: "delete" })
// //   .then(resp=>resp.json())
// //   .then(body=>{
// //     const msg = body.data;
// //     alert(msg);
// //     consultarContactos();
// //   });
// // }

// // document.getElementById("contactoForm").addEventListener("submit", (e) => {
// //   e.preventDefault();
// //   registrarContacto();
// // });