import {
  useState,
  useContext,
  useEffect,
} from 'react';
import DataContext from './DataContext';
import Message from './Message';

const AddFunds = () => {
  const {
    setModalAdd,
    modalAdd,
    setEditAccount,
    message,
    resetMessage,
    setMessage,
  } = useContext(DataContext);

  const [funds, setFunds] =
    useState('');

  useEffect(() => {
    if (message[1] === 'message') {
      setFunds('');
      setModalAdd(null);
      resetMessage();
    }
  }, [
    message,
    setModalAdd,
    resetMessage,
  ]);

  const close = () => {
    setMessage('');
    setModalAdd(null);
  };

  const add = () => {
    resetMessage();
    const updatedAccount = {
      ...modalAdd,
      balance: modalAdd.balance,
      id: modalAdd.id,
      method: 'add',
      sum: +funds,
    };
    setEditAccount(updatedAccount);
  };

  if (null === modalAdd) {
    return null;
  }

  return (
    <div className="modal">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h2 className="modal-title">
              Add funds
            </h2>
            <button
              type="button"
              className="close"
              onClick={close}
            >
              <span aria-hidden="true">
                &times;
              </span>
            </button>
          </div>
          <div className="modal-body">
            <div className="card mt-4">
              <div className="card-body">
                <div className="form-group">
                  <label>Funds</label>
                  <input
                    type="text"
                    className="form-control"
                    value={funds}
                    onChange={(e) =>
                      setFunds(
                        e.target.value
                      )
                    }
                  />
                  <small className="form-text text-muted">
                    Add funds to account
                  </small>
                </div>
              </div>
            </div>
            {message && (
              <Message
                message={message}
              />
            )}
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-outline-success"
              onClick={add}
            >
              Add
            </button>
            <button
              type="button"
              className="btn btn-outline-secondary"
              onClick={close}
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AddFunds;
