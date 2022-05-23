const sortValues = (values, sort) => {
  const valuesToSort = values;
  return valuesToSort.sort((a, b) =>
    a[sort] > b[sort]
      ? 1
      : b[sort] > a[sort]
      ? -1
      : 0
  );
};

export default sortValues;
