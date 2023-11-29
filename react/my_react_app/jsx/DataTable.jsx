// import React from 'react';
// import DataTable from 'react-data-table-component';

// const DataTable = ({ title, columns, data, pagination, highlightOnHover }) => {
//  return (
//     <div>
//       <DataTable
//         title={title}
//         columns={columns}
//         data={data}
//         pagination={pagination}
//         highlightOnHover={highlightOnHover}
//       />
//     </div>
//  );
// };

// export default DataTable;

// Dans le fichier DataTableComponent.jsx
import React from 'react';
import DataTable from 'react-data-table-component';

const MyDataTable = ({ title, columns, data, pagination, highlightOnHover }) => {
  return (
    <div>
      <DataTable
        title={title}
        columns={columns}
        data={data}
        pagination={pagination}
        highlightOnHover={highlightOnHover}
      />
    </div>
  );
};

export default MyDataTable;
