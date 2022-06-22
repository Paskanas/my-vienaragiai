import { useContext } from 'react';
import DataContext from './DataContext';

const ListRow = ({ account }) => {
  const {
    setDeleteAccount,
    setModalAdd,
    setModalDeduct,
    resetMessage,
  } = useContext(DataContext);

  const deleteHandler = () => {
    resetMessage();
    setDeleteAccount(account);
  };
  const addHandler = () => {
    resetMessage();
    setModalAdd(account);
  };
  const deductHandler = () => {
    resetMessage();
    setModalDeduct(account);
  };

  return (
    <>
      {
        <tr>
          <td> {account.id} </td>
          <td> {account.name} </td>
          <td> {account.surname} </td>
          <td>{account.bankAccount}</td>
          <td>
            {account.identityCode}
          </td>
          <td> {account.balance} </td>
          <td>
            {/* {account.balance > 0 ? round(self::convertTo(account.balance, $to), 2) : 0}*/}
          </td>
          <td>
            <button
              name="delete"
              onClick={deleteHandler}
            >
              Ištrinti
            </button>
          </td>
          <td>
            <button
              onClick={addHandler}
            >
              Pridėti lėšų
            </button>
          </td>
          <td>
            <button
              onClick={deductHandler}
            >
              Nuskaičiuoti lėšas
            </button>
          </td>
        </tr>
      }
      {/*
          <td> . ($data['balance'] > 0 ? round(self::convertTo($data['balance'], $to), 2) : 0) . '</td>' .
          '<td>' . '<button type="submit" name="delete" value=' . $data['id'] . '>Ištrinti</button>' . '</td>' .
          '<td>' . '<a href="' . URL . $parent . 'addFunds/' . $data['id'] . '">Pridėti lėšų</a>' . '</td>' .
          '<td>' . '<a href="' . URL . $parent . 'deductFunds/' . $data['id'] . '">Nuskaičiuoti lėšas</a>' . '</td>' . 
          */}
    </>
  );
};

export default ListRow;
