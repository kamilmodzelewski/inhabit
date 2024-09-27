import { render, screen, fireEvent } from '@testing-library/react';
import UrlForm from './UrlForm';

test('renders form and shortens URL', async () => {
  render(<UrlForm request={async (url) => { return 'slug' }} />);
  const input = screen.getByPlaceholderText('Enter URL');
  fireEvent.change(input, { target: { value: 'https://example.com' } });
  fireEvent.click(screen.getByText(/Shorten/i));
  expect(screen.getByText(/Shortened URL/)).toBeInTheDocument();
});