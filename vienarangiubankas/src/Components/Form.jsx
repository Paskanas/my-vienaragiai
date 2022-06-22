import { useState } from 'react';

const Form = ({ showForm }) => {
  const [alabama, setAlabama] =
    useState('');

  if (!showForm) {
    return null;
  }

  const go = () => {
    showForm = true;
  };

  return (
    <>
      <h1>Alabama form</h1>

      <fieldset>
        <legend>Enter</legend>
        <form>
          <input
            type="text"
            name="alabama"
            value={alabama}
            onChange={(e) =>
              setAlabama()
            }
          />
          <button
            type="button"
            onClick={go}
          >
            Submit
          </button>
        </form>
      </fieldset>
    </>
  );
};

export default Form;
