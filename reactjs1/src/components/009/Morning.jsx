const calc = (num) => {
  return num ** 2;
};

const Morning = () => {
  return (
    <>
      <h2
        style={{
          color: 'red',
          backgroundColor: 'skyblue',
          padding:'20px'
        }}
      >
        Good{' '}
      </h2>
      <span>Morning {calc(10)}</span>
    </>
  );
};

export default Morning;
