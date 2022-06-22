const Home = ({ list }) => {
  console.log(list);
  return (
    <>
      <h1>Sweet home alabama</h1>
      <ul>
        {list.map((value, i) => (
          <li key={i}>{value}</li>
        ))}
      </ul>
    </>
  );
};

export default Home;
