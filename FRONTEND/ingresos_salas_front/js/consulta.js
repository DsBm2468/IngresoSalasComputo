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

function cargarTablaContactos() {
  
  const tbody = document
    .getElementById("contactosTable")
    .getElementsByTagName("tbody")[0];
  tbody.innerHTML = contactos
    .map((item) => {
      let html = "<tr>";
      html += "   <td>" + item.nombre + "</td>";
      html += "   <td>" + item.email + "</td>";
      html += "   <td>" + item.telefono + "</td>";
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
    .join("");
}

consultarContactos();
