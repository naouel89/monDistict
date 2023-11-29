
// import React, { useState } from 'react';
// import DataTable from 'react-data-table-component';

// const MyTable = () => {
//     const [filterText, setFilterText] = useState('');
//     const [resetPaginationToggle, setResetPaginationToggle] = useState(false);

//     const filteredItems = []; // Remplacez par vos données

//     const columns = [
//         {
//             name: 'Nom',
//             selector: 'name',
//             sortable: true,
//         },
//         {
//             name: 'Email',
//             selector: 'email',
//             sortable: true,
//         },
//     ];

//     const customStyles = {
//         header: {
//             style: {
//                 minHeight: '10px',
//                 borderBottom: '1px solid #d6d6d6',
//                 backgroundColor: '#ffffff',
//             },
//         },
//         rows: {
//             style: {
//                 minHeight: '100px',
//                 borderBottom: '1px solid #d6d6d6',
//                 backgroundColor: '#ffffff',
//             },
//         },
//     };

//     const handleFilterTextChange = e => {
//         setResetPaginationToggle(!resetPaginationToggle);
//         setFilterText(e.target.value);
//     };

//     const filtered = []; // Remplacez par votre logique de filtrage

//     return (
//         <DataTable
//             title="Exemple de tableau"
//             columns={columns}
//             data={filtered}
//             customStyles={customStyles}
//             pagination
//             paginationResetDefaultPage={resetPaginationToggle} // optionally, use paginationResetDefaultPage to reset pagination to page 1 when the filter text changes
//             subHeader
//             subHeaderComponent={
//                 <input
//                     type="text"
//                     placeholder="Recherche"
//                     value={filterText}
//                     onChange={handleFilterTextChange}
//                 />
//             }
//         />
//     );
// };

// export default MyTable;

import React from 'react';
import MyDataTable from '.jsx/DataTable.jsx'; // Assurez-vous d'ajuster le chemin


const MyTable = () => {
    const [data, setData] = useState([
        { name: "Booth", prenom: "Cliff", ville: "Hollywood" },
        { name: "Lebowski", prenom: "Jeff", ville: "Los Angeles" },
        { name: "Vega", prenom: "Vincent", ville: "Los Angeles" },
        { name: "Kiddo", prenom: "Beatrix", ville: "El Paso" },
    ]);

    const columns = [
        {
            name: 'Nom',
            selector: 'name',
            sortable: true,
        },
        {
            name: 'Prénom',
            selector: 'prenom',
            sortable: true,
        },
        {
            name: 'Ville',
            selector: 'ville',
            sortable: true,
        }
    ];
    return (
        <MyDataTable
          title="Tableau des Utilisateurs"
          columns={columns}
          data={data}
          pagination
          highlightOnHover
        />
      );
    };
    
export default MyTable;
