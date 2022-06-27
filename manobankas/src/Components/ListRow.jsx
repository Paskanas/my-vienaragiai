import axios from 'axios';
import { useState } from 'react';
import { useEffect } from 'react';
import { useContext } from 'react';
import DataContext from './DataContext';

const ListRow = ({
  account,
  convertTo,
}) => {
  const {
    setDeleteAccount,
    setModalAdd,
    setModalDeduct,
    resetMessage,
  } = useContext(DataContext);

  const [
    exchangeRate,
    setExchangeRate,
  ] = useState(0);

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

  useEffect(() => {
    axios
      .get(
        'https://api.exchangerate.host/latest?base=EUR&symbols=' +
          convertTo
      )
      .then((res) => {
        setExchangeRate(
          res.data.rates[convertTo]
        );
      });
  }, [convertTo]);

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
            {(
              account.balance *
              exchangeRate
            ).toFixed(2)}
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
    </>
  );
};

export default ListRow;
