import {
  useEffect,
  useContext,
  useState,
} from 'react';
import axios from 'axios';
import DataContext from './DataContext';
import Message from './Message';

const Create = () => {
  const {
    setCreateAccount,
    message,
    resetMessage,
    modalCreate,
    setModalCreate,
  } = useContext(DataContext);

  const [name, setName] = useState('');
  const [surname, setSurname] =
    useState('');
  const [iban, setIban] = useState('');
  const [
    identityCode,
    setIdentityCode,
  ] = useState(null);

  useEffect(() => {
    if (iban) return;
    axios
      .get(
        'http://manobankas.lt/api/newIban'
      )
      .then((res) => setIban(res.data));
  }, [iban]);

  useEffect(() => {
    if (message[1] === 'message') {
      setModalCreate(null);
      resetMessage();
      resetInput();
    }
  }, [
    message,
    setModalCreate,
    resetMessage,
  ]);

  const resetInput = () => {
    setName('');
    setSurname('');
    setIdentityCode('');
    setIban('');
  };

  const createHandler = () => {
    resetMessage();
    setCreateAccount({
      name,
      surname,
      identityCode,
    });
    if (message[1] === 'message') {
      resetInput();
    }
  };

  const close = () => {
    resetMessage();
    setModalCreate(null);
  };

  if (null === modalCreate) {
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
                  <label>Name</label>
                  <input
                    type="text"
                    className="form-control"
                    value={name}
                    onChange={(e) =>
                      setName(
                        e.target.value
                      )
                    }
                  />
                  <small className="form-text text-muted">
                    Fill name
                  </small>
                </div>
                <div className="form-group">
                  <label>Surname</label>
                  <input
                    type="text"
                    className="form-control"
                    required
                    value={surname}
                    onChange={(e) =>
                      setSurname(
                        e.target.value
                      )
                    }
                  />
                  <small className="form-text text-muted">
                    Fill surname
                  </small>
                </div>
                <div className="form-group">
                  <label>
                    Identity code
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    required
                    value={identityCode}
                    onChange={(e) =>
                      setIdentityCode(
                        e.target.value
                      )
                    }
                  />
                  <small className="form-text text-muted">
                    Fill identity code
                  </small>
                </div>
                <div className="form-group">
                  <label>
                    Identity code
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    readOnly
                    required
                    value={
                      iban.substr(
                        0,
                        4
                      ) +
                      ' ' +
                      iban.substr(
                        4,
                        4
                      ) +
                      ' ' +
                      iban.substr(
                        8,
                        4
                      ) +
                      ' ' +
                      iban.substr(
                        12,
                        4
                      ) +
                      ' ' +
                      iban.substr(16, 4)
                    }
                    onChange={(e) =>
                      setIdentityCode(
                        e.target.value
                      )
                    }
                  />
                  <small className="form-text text-muted">
                    Fill identity code
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
              onClick={createHandler}
            >
              Create
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

export default Create;
