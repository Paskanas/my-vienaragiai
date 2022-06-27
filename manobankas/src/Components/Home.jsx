import { useContext } from 'react';
import { logout } from '../Functions/auth';
import AddFunds from './AddFunds';
import Create from './Create';
import DataContext from './DataContext';
import DeductFunds from './DeductFunds';
import List from './List';
import Loader from './Loader';

const Home = () => {
  const {
    setModalCreate,
    setPageRefresh,
    accountsList,
    loading,
  } = useContext(DataContext);

  const createHandler = () => {
    setModalCreate(accountsList);
  };

  const logoutHandler = () => {
    logout();
    setPageRefresh(Date.now());
  };

  return (
    <>
      <header className="header">
        <button
          className="btn create"
          onClick={createHandler}
        >
          Create account
        </button>
        <button
          className="btn logout"
          onClick={logoutHandler}
        >
          Logout
        </button>
      </header>
      <div className="container">
        <div className="row">
          <List />
          <Create />
        </div>
      </div>
      <AddFunds />
      <DeductFunds />
      <Create />
      {loading && <Loader />}
    </>
  );
};

export default Home;
