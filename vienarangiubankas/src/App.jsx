import './App.css';
import Home from './Components/Home';
import {
  useState,
  useEffect,
} from 'react';
import axios from 'axios';
import Form from './Components/Form';

function App() {
  const [list, setList] = useState([]);
  const [showForm, setShowForm] =
    useState(false);

  const [formData, setFormData] =
    useState(null);

  const [youSay, setYouSay] =
    useState(null);

  useEffect(() => {
    axios
      .get(
        'http://vienaragiubankas.lt/api/home'
      )
      .then((res) => setList(res.data));
  }, []);

  useEffect(() => {
    if (formData === null) return;
    axios
      .post(
        'http://vienaragiubankas.lt/api/form',
        formData
      )
      .then((res) =>
        setYouSay(res.data.youSay)
      );
  }, [formData]);

  return (
    <>
      <Home list={list} />
      <button
        onClick={() =>
          setShowForm((f) => !f)
        }
      >
        Show form
      </button>
      <Form showForm={showForm} />
    </>
  );
}

export default App;
