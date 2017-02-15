require 'spec_helper'

describe 'PostgreSQL' do
  ENV['PGPASSWORD'] = 'mate20mg'

  describe command("psql --user development --host 127.0.0.1 DE_development_zed -c \"SELECT * FROM pg_extension WHERE extname='citext'\"") do
    its(:stdout) { should include('1 row') }
  end
end
