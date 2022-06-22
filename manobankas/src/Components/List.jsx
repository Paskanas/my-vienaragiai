import { useContext } from 'react';
import DataContext from './DataContext';
import ListRow from './ListRow';

const List = () => {
  const { accountsList } = useContext(
    DataContext
  );

  return (
    <>
      <table className="listForm">
        <tbody className="accountsTable">
          <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Sąskaitos nr.</th>
            <th>Asmens kodas</th>
            <th>Suma Eur</th>
            <th>Suma ' . $to . '</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          {accountsList.map(
            (account) => (
              <ListRow
                key={account.id}
                account={account}
              />
            )
          )}
        </tbody>
      </table>
    </>
  );
};

export default List;
