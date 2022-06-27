import axios from 'axios';
import { useEffect } from 'react';
import {
  useContext,
  useState,
} from 'react';
import DataContext from './DataContext';
import ListRow from './ListRow';

const List = () => {
  const { accountsList } = useContext(
    DataContext
  );

  const [convertTo, setConvertTo] =
    useState('VES');

  const [
    currenciesList,
    setCurrenciesList,
  ] = useState(null);

  useEffect(() => {
    const getData = async () => {
      axios
        .get(
          'https://api.exchangerate.host/symbols'
        )
        .then((res) => {
          setCurrenciesList(
            res.data.symbols
          );
        })
        .catch((err) => {
          console.log(err);
        });
    };
    getData();
  }, []);

  const convertHandler = (e) => {
    setConvertTo(e.target[0].value);
    e.preventDefault();
  };

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
            <th>Suma {convertTo}</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          {accountsList &&
            accountsList.map(
              (account) => (
                <ListRow
                  key={account.id}
                  account={account}
                  convertTo={convertTo}
                />
              )
            )}
        </tbody>
      </table>
      <form
        className="currencyForm"
        // action=""
        // method="post"
        onSubmit={convertHandler}
      >
        <label htmlFor="currency">
          Choose your currency from the
          list:
        </label>
        <input
          className="currencyInput"
          list="currencies"
          name="currency"
          id="currency"
          placeholder="Choose currency to convert"
        />
        <datalist id="currencies">
          {currenciesList &&
            Object.keys(
              currenciesList
            ).map((key, i) => {
              return (
                <option
                  key={i}
                  onClick={() =>
                    convertHandler(i)
                  }
                  value={
                    currenciesList[key]
                      .code
                  }
                >
                  {
                    currenciesList[key]
                      .description
                  }
                </option>
              );
            })}
        </datalist>
        <button
          className="currencyButton"
          type="submit"
          name="convertTo"
        >
          Convert
        </button>
      </form>
    </>
  );
};

export default List;
