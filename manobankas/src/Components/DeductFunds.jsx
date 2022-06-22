import {
  useState,
  useEffect,
  useContext,
} from 'react';
import DataContext from './DataContext';
import Message from './Message';

const DeductFunds = () => {
  const {
    modalDeduct,
    setEditAccount,
    message,
    resetMessage,
    setModalDeduct,
  } = useContext(DataContext);

  const [funds, setFunds] =
    useState('');

  useEffect(() => {
    if (message[1] === 'message') {
      setFunds('');
      setModalDeduct(null);
      resetMessage();
    }
  }, [
    message,
    setModalDeduct,
    resetMessage,
  ]);

  const close = () => {
    resetMessage();
    setModalDeduct(null);
  };

  const deduct = () => {
    resetMessage();
    const updatedAccount = {
      ...modalDeduct,
      balance: modalDeduct.balance,
      id: modalDeduct.id,
      method: 'deduct',
      sum: +funds,
    };
    setEditAccount(updatedAccount);
  };
  if (null === modalDeduct) {
    return null;
  }

  return (
    <div className="modal">
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content">
          <div className="modal-header">
            <h2 className="modal-title">
              Deduct funds
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
                    Deduct funds from
                    account
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
              onClick={deduct}
            >
              Deduct
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

export default DeductFunds;
