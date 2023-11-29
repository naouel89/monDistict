
// import { useState } from 'react';


// export default MyTable;

import React, { useState } from 'react';
import DataTable from "react-data-table-component";


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
        <DataTable
          title="Tableau des Utilisateurs"
          columns={columns}
          data={data}
          pagination
          highlightOnHover
        />
      );
    };
    
export default MyTable;
