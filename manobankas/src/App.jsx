import {
  useEffect,
  useState,
} from 'react';
import axios from 'axios';
import './bootstrap.css';
import './App.scss';
import Home from './Components/Home';
import DataContext from './Components/DataContext';
import AddFunds from './Components/AddFunds';
import DeductFunds from './Components/DeductFunds';
import Create from './Components/Create';
import Loader from './Components/Loader';

function App() {
  const [loading, setLoading] =
    useState(false);

  const [
    accountsList,
    setAccountsList,
  ] = useState([]);
  const [
    createAccount,
    setCreateAccount,
  ] = useState(null);
  const [editAccount, setEditAccount] =
    useState(null);
  const [
    deleteAccount,
    setDeleteAccount,
  ] = useState(null);

  const [modalAdd, setModalAdd] =
    useState(null);
  const [modalDeduct, setModalDeduct] =
    useState(null);
  const [modalCreate, setModalCreate] =
    useState(null);

  const [pageRefresh, setPageRefresh] =
    useState(Date.now());

  const [message, setMessage] =
    useState('');

  const resetMessage = () => {
    setMessage('');
  };

  useEffect(() => {
    setLoading(true);
    axios
      .get(
        'http://manobankas.lt/api/home'
      )
      .then((res) => {
        setAccountsList(res.data);
        setLoading(false);
      });
  }, [pageRefresh]);

  useEffect(() => {
    if (createAccount === null) return;
    setLoading(true);
    if (createAccount) {
      axios
        .post(
          'http://manobankas.lt/api/home',
          createAccount
        )
        .then((res) => {
          setMessage(res.data);
          setPageRefresh(Date.now());
          setLoading(false);
        });
    }
  }, [createAccount]);

  useEffect(() => {
    if (null === deleteAccount) return;
    setLoading(true);
    axios
      .delete(
        'http://manobankas.lt/api/home/' +
          deleteAccount.id
      )
      .then((res) => {
        setMessage(res.data);
        setPageRefresh(Date.now());
        setLoading(false);
      });
  }, [deleteAccount]);

  useEffect(() => {
    if (null === editAccount) return;
    setLoading(true);
    axios
      .put(
        'http://manobankas.lt/api/home/' +
          editAccount.id,
        editAccount
      )
      .then((res) => {
        setMessage(res.data);
        setPageRefresh(Date.now());
        setLoading(false);
      });
  }, [editAccount]);

  const createHandler = () => {
    setModalCreate(accountsList);
  };
  return (
    <DataContext.Provider
      value={{
        setCreateAccount,
        setEditAccount,
        accountsList,
        setDeleteAccount,
        setModalAdd,
        modalAdd,
        setModalDeduct,
        modalDeduct,
        setModalCreate,
        modalCreate,
        message,
        resetMessage,
        setMessage,
      }}
    >
      <header className="header">
        <button
          className="createBtn"
          onClick={createHandler}
        >
          Create account
        </button>
      </header>
      <div className="container">
        <div className="row">
          <Home />
        </div>
      </div>
      <AddFunds />
      <DeductFunds />
      <Create />
      {loading && <Loader />}
    </DataContext.Provider>
  );
}

export default App;
