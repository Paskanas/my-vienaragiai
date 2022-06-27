import {
  useEffect,
  useState,
} from 'react';
import axios from 'axios';
import './bootstrap.css';
import './App.scss';
import Home from './Components/Home';
import DataContext from './Components/DataContext';
import Login from './Components/Login';
import { authConfig } from './Functions/auth';

function App() {
  const [user, setUser] =
    useState(null);

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
        'http://manobankas.lt/api/home',
        authConfig()
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
          createAccount,
          authConfig()
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
          deleteAccount.id,
        authConfig()
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
        editAccount,
        authConfig()
      )
      .then((res) => {
        setMessage(res.data);
        setPageRefresh(Date.now());
        setLoading(false);
      });
  }, [editAccount]);

  useEffect(() => {
    axios
      .get(
        'http://manobankas.lt/api/auth',
        authConfig()
      )
      .then((res) => {
        if (res.data.user) {
          setUser(res.data.user);
          // setTimeout(() => {
          //   logout();
          //   setPageRefresh((r) => !r);
          // }, 7000);
        } else {
          setUser(null);
        }
      });
  }, [pageRefresh]);

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
        setPageRefresh,
        loading,
      }}
    >
      {user ? (
        <Home />
      ) : (
        <>
          <div className="App">
            <header className="App-header">
              <Login />
            </header>
          </div>
        </>
      )}
    </DataContext.Provider>
  );
}

export default App;
